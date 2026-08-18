<?php

namespace App\Helpers;

class VideoHelper
{
    /**
     * Parse video URL and return embed information
     */
    public static function parse($url)
    {
        if (empty($url)) {
            return [
                'type' => 'none',
                'embed_url' => null,
                'is_vertical' => true,
                'video_id' => null,
            ];
        }

        $url = trim($url);

        // 1. YouTube Shorts: https://www.youtube.com/shorts/VIDEO_ID or https://youtube.com/shorts/VIDEO_ID?feature=share
        if (preg_match('/(?:youtube\.com\/shorts\/)([a-zA-Z0-9_-]+)/i', $url, $matches)) {
            $id = $matches[1];
            return [
                'type' => 'youtube_shorts',
                'embed_url' => "https://www.youtube.com/embed/{$id}?autoplay=1&rel=0&modestbranding=1&loop=1",
                'is_vertical' => true,
                'video_id' => $id,
                'thumbnail' => "https://img.youtube.com/vi/{$id}/hqdefault.jpg",
            ];
        }

        // 2. Regular YouTube: https://www.youtube.com/watch?v=VIDEO_ID or https://youtu.be/VIDEO_ID
        if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/i', $url, $matches)) {
            $id = $matches[1];
            return [
                'type' => 'youtube',
                'embed_url' => "https://www.youtube.com/embed/{$id}?autoplay=1&rel=0",
                'is_vertical' => false,
                'video_id' => $id,
                'thumbnail' => "https://img.youtube.com/vi/{$id}/hqdefault.jpg",
            ];
        }

        // 3. Instagram Reels: https://www.instagram.com/reel/CODE/ or /p/CODE/
        if (preg_match('/instagram\.com\/(?:reel|p)\/([a-zA-Z0-9_-]+)/i', $url, $matches)) {
            $code = $matches[1];
            return [
                'type' => 'instagram_reel',
                'embed_url' => "https://www.instagram.com/reel/{$code}/embed/",
                'is_vertical' => true,
                'video_id' => $code,
                'thumbnail' => null,
            ];
        }

        // 4. Direct video file (mp4, webm, etc.)
        if (preg_match('/\.(mp4|webm|ogg)($|\?)/i', $url)) {
            return [
                'type' => 'direct',
                'embed_url' => $url,
                'is_vertical' => true,
                'video_id' => null,
                'thumbnail' => null,
            ];
        }

        // Fallback: Embed directly if it's already an embed link or fallback iframe
        return [
            'type' => 'other',
            'embed_url' => $url,
            'is_vertical' => true,
            'video_id' => null,
            'thumbnail' => null,
        ];
    }
}
