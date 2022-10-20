<?=
'<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL
?>
<rss xmlns:dc="http://purl.org/dc/elements/1.1/"  version="2.0">
    <channel>
        <title><![CDATA[ Careermove]]></title>
        <link><![CDATA[ https://careermove.co.ke/hiring/feeds ]]></link>
        <description><![CDATA[ Verified Job alerts in Kenya ]]></description>
        <language>en</language>
        <pubDate>{{ now() }}</pubDate>

        @foreach($jobs as $job)
            <item>
                <id><![CDATA[ {{$job->id}}]]></id>
                <title><![CDATA[{{ $job->title }}]]></title>
                <position><![CDATA[{{ $job->title }}]]></position>
                <link><![CDATA[{{ route('listings.show',$job->slug) }}]]></link>
                <guid isPermaLink="false"><![CDATA[{{ route('listings.show',$job->slug) }}]]></guid>
                <introduction><![CDATA[{{$job->meta_description}}]]></introduction>
                <company><![CDATA[{{$job->company->name}}]]></company>
                <experience><![CDATA[{{$job->experience->name}}]]></experience>
                <working_hours><![CDATA[{{$job->type->name}}]]></working_hours>
                <industry><![CDATA[{{$job->industry->name}}]]></industry>
                <profession><![CDATA[{{$job->profession->name}}]]></profession>
                <location><![CDATA[{{$job->location->name}}]]></location>
                <region><![CDATA[{{$job->location->name}}]]></region>
                <expiryDate><![CDATA[{{\Carbon\Carbon::parse($job->deadline)->toRssString()}}]]></expiryDate>
                <pubDate><![CDATA[{{ $job->created_at->toRssString() }}]]></pubDate>

            </item>
        @endforeach
    </channel>
</rss>


