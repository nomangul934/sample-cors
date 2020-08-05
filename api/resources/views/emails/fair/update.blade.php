<div>
    <h3 style="text-align: center;">
        New message from {{$content['from']}}!
    </h3>
    Hi Dear, <br>

    {{$content['schoolname']}} have changed their university fair details<br>
    Here are the new changes: <br>
    Start Date : {{$content['startdate']}}<br>
    Start Time : {{$content['starttime']}}<br>
    End Date : {{$content['enddate']}}<br>
    End TIme : {{$content['endtime']}}<br>
    <br>
         {!! $mail_content !!}
    <br>
    Regards.

    {{--To register in this fair click <a href="{{ $content['url'] }}">here</a>--}}
</div>
