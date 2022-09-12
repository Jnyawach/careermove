<?=
'<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL
?>
<rss xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:media="http://search.yahoo.com/mrss/" version="2.0">
    <channel>
        <title><![CDATA[ Careermove]]></title>
        <link><![CDATA[ https://careermove.co.ke/feeds ]]></link>
        <description><![CDATA[ Job alerts, Career advice in Kenya ]]></description>
        <language>en</language>
        <pubDate>{{ now() }}</pubDate>

        @foreach($posts as $post)
            <item>
                <title><![CDATA[{{ $post->title }}]]></title>
                <link>{{ route('blog.show',$post->slug) }}</link>
                <description><![CDATA[{{$post->summary}}]]></description>

                <author><![CDATA[{{$post->author->first_name}} {{$post->author->last_name}}]]></author>
                <guid>{{ route('blog.show',$post->slug) }}</guid>
                <pubDate>{{ $post->created_at->toRssString() }}</pubDate>
                <media:content url="{{asset($post->getFirstMediaUrl('imageCard')? $post->getFirstMediaUrl('imageCard'):'/images/no-image.png' )}}"/>
            </item>
        @endforeach
    </channel>
</rss>
