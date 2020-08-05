<div>
    Hi Dear, <br>

    You received this invitation from {{$invitation->fair->school->name}} school, <br>
    to participate in there fair started at {{ $invitation->fair->start_date }}. <br>

    To register in this fair click <a href="{{ $url }}">here</a>
</div>

<div>
    If button not working use this url : {{ $url }}
</div>