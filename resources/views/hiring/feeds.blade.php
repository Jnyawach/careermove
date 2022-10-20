<?=
'<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL
?>
<rss xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:media="http://search.yahoo.com/mrss/" version="2.0">
    <channel>
        <title><![CDATA[ Careermove]]></title>
        <link><![CDATA[ https://careermove.co.ke/hiring/feeds ]]></link>
        <description><![CDATA[ Job alerts, Career advice in Kenya ]]></description>
        <language>en</language>
        <pubDate>{{ now() }}</pubDate>

        @foreach($companies as $company)
            <item>
                <title><![CDATA[Careers at {{ $company->name }} {{\Carbon\Carbon::today()->format('M Y')}}]]></title>
                <link>{{ route('hiring.show',$company->slug) }}</link>
                <description><![CDATA[{{$company->name}} is hiring for multiple vacancies today. Read the full descriptions here]]></description>
                <industry >{{$company->jobs->first()->industry->name}}</industry>
                <guid isPermaLink="false">{{ route('hiring.show',$company->slug) }}</guid>
                <pubDate>{{ $company->jobs->first()->created_at->toRssString() }}</pubDate>

            </item>
        @endforeach
    </channel>
</rss>

