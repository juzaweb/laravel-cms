<?php
/**
 * JUZAWEB CMS - Laravel CMS for Your Project
 *
 * @package    juzaweb/juzacms
 * @author     The Anh Dang
 * @link       https://juzaweb.com
 * @license    GNU V2
 */

namespace Juzaweb\DevTool\Http\Controllers\PostTypes;

use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Inertia\Response;
use Juzaweb\CMS\Contracts\HookActionContract;
use Juzaweb\CMS\Contracts\LocalThemeRepositoryContract;
use Juzaweb\DevTool\Http\Controllers\Controller;
use Juzaweb\DevTool\Http\Requests\PostTypeRequest;

class ThemePostTypeController extends Controller
{
    public function __construct(
        protected LocalThemeRepositoryContract $themeRepository,
        protected HookActionContract $hookAction
    ) {
        //
    }

    public function create(Request $request, string $name): View|Response
    {
        $theme = $this->themeRepository->findOrFail($name);

        $title = "Dev tool for theme: {$theme->getName()}";

        $configs = $this->getConfigs('themes');

        return $this->view(
            'cms::backend.dev-tool.theme.post-type.create',
            compact('theme', 'title', 'configs')
        );
    }

    public function store(PostTypeRequest $request, string $name): JsonResponse|RedirectResponse
    {
        $theme = $this->themeRepository->findOrFail($name);
        $key = Str::plural(Str::slug($request->input('key')));

        if ($this->hookAction->getPostTypes($key)->isNotEmpty()) {
            return $this->error('Post type already exists.');
        }

        $register = $this->getThemeRegister($theme);

        $register['post_types'][$key] = $request->all();

        File::put($theme->getPath('register.json'), json_encode($register, JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT));

        return $this->success(['message' => 'Post type created successfully.']);
    }
}
