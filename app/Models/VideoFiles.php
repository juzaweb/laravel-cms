<?php

namespace App\Models;

use App\Helpers\GoogleDrive;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

/**
 * App\Models\VideoFiles
 *
 * @property int $id
 * @property int $server_id
 * @property int $movie_id
 * @property string $label
 * @property int $order
 * @property string $source
 * @property string $url
 * @property string|null $video_240p
 * @property string|null $video_360p
 * @property string|null $video_480p
 * @property string|null $video_720p
 * @property string|null $video_1080p
 * @property string|null $video_2048p
 * @property string|null $video_4096p
 * @property int $converted
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\VideoFiles newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\VideoFiles newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\VideoFiles query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\VideoFiles whereConverted($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\VideoFiles whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\VideoFiles whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\VideoFiles whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\VideoFiles whereMovieId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\VideoFiles whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\VideoFiles whereServerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\VideoFiles whereSource($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\VideoFiles whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\VideoFiles whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\VideoFiles whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\VideoFiles whereVideo1080p($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\VideoFiles whereVideo2048p($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\VideoFiles whereVideo240p($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\VideoFiles whereVideo360p($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\VideoFiles whereVideo4096p($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\VideoFiles whereVideo480p($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\VideoFiles whereVideo720p($value)
 * @mixin \Eloquent
 */
class VideoFiles extends Model
{
    protected $table = 'video_files';
    protected $primaryKey = 'id';
    protected $fillable = [
        'label',
        'order',
        'source',
        'url',
        'status',
    ];
    
    public function server() {
        $this->belongsTo('App\Models\Video\VideoServers', 'server_id', 'id');
    }
    
    public function getFiles() {
        
        switch ($this->source) {
            case 'youtube';
                return $this->getVideoYoutube();
            case 'vimeo':
                return $this->getVideoVimeo();
            case 'upload':
                return $this->getVideoUpload();
            case 'gdrive':
                return $this->getVideoGoogleDrive();
            case 'mp4';
                return $this->getVideoUrl('mp4');
            case 'mkv';
                return $this->getVideoUrl('mkv');
            case 'webm':
                return $this->getVideoUrl('webm');
            case 'm3u8':
                return $this->getVideoUrl('m3u8');
            case 'embed':
                return $this->getVideoUrl('embed');
        }
        
        return [];
    }
    
    protected function getExtension() {
        $file_name = basename($this->url);
        return explode('.', $file_name)[count(explode('.', $file_name)) - 1];
    }
    
    protected function getVideoYoutube() {
        return [
            (object) [
                'file' => 'https://www.youtube.com/embed/' . get_youtube_id($this->url),
                'type' => 'mp4',
            ]
        ];
    }
    
    protected function getVideoVimeo() {
        return [
            (object) [
                'file' => 'https://player.vimeo.com/video/' . get_vimeo_id($this->url),
                'type' => 'mp4',
            ]
        ];
    }
    
    protected function getVideoUrl($type) {
        return [
            (object) [
                'file' => $this->url,
                'type' => $type,
            ]
        ];
    }
    
    protected function getVideoUpload() {
        if ($this->converted == 1) {
            $files = [];
            if ($this->video_240p) {
                $files[] = (object) [
                    'label' => '240p',
                    'type' => $this->getExtension(),
                    'file' => $this->generateStreamUrl($this->video_240p),
                ];
            }
    
            if ($this->video_360p) {
                $files[] = (object) [
                    'label' => '360p',
                    'type' => $this->getExtension(),
                    'file' => $this->generateStreamUrl($this->video_360p),
                ];
            }
    
            if ($this->video_480p) {
                $files[] = (object) [
                    'label' => '480p',
                    'type' => $this->getExtension(),
                    'file' => $this->generateStreamUrl($this->video_480p),
                ];
            }
    
            if ($this->video_720p) {
                $files[] = (object) [
                    'label' => '720p',
                    'type' => $this->getExtension(),
                    'file' => $this->generateStreamUrl($this->video_720p),
                ];
            }
    
            if ($this->video_1080p) {
                $files[] = (object) [
                    'label' => '1080p',
                    'type' => $this->getExtension(),
                    'file' => $this->generateStreamUrl($this->video_1080p),
                ];
            }
    
            if ($this->video_2048p) {
                $files[] = (object) [
                    'label' => '2048p',
                    'type' => $this->getExtension(),
                    'file' => $this->generateStreamUrl($this->video_2048p),
                ];
            }
    
            if ($this->video_4096p) {
                $files[] = (object) [
                    'label' => '4096p',
                    'type' => $this->getExtension(),
                    'file' => $this->generateStreamUrl($this->video_4096p),
                ];
            }
            
            if (count($files) > 0) {
                return $files;
            }
        }
        
        return [
            (object) [
                'file' => $this->generateStreamUrl($this->url),
                'type' => $this->getExtension(),
            ]
        ];
    }
    
    protected function getVideoGoogleDrive() {
        $gdrive = GoogleDrive::link_stream(get_google_drive_id($this->url));
        if ($gdrive) {
            
            $files = [];
            foreach ($gdrive->qualities as $quality) {
                $file = [
                    'class' => 'GoogleDrive',
                    'file' => $gdrive->stream_id,
                ];
                
                $token = urlencode(base64_encode(Crypt::encryptString(json_encode($file))));
                
                $files[] = (object) [
                    'label' => $quality,
                    'file' => route('stream.service', [
                        $token,
                        $quality,
                        $quality . '.mp4'
                    ]),
                    'type' => 'mp4',
                ];
            }
            
            return $files;
        }
        
        return [];
    }
    
    protected function generateStreamUrl($path) {
        $token = generate_token(basename($path));
        $file = json_encode([
            'path' => $path,
        ]);
        
        $file = \Crypt::encryptString($file);
        
        return $this->getStreamLink($token, $file, basename($path));
    }
    
    protected function getStreamLink($token, $file, $name) {
        return route('stream.video', [$token, base64_encode($file), $name]);
    }
}
