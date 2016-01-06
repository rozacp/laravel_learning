<div>
    {!! Form::label('title', 'Task title:') !!}
    {!! Form::text('title', null, ['placeholder' => 'Enter task title']) !!}
</div>

<div>
    {!! Form::label('body', 'Task body:') !!}
    {!! Form::textarea('body', null, ['placeholder' => 'Enter task body']) !!}
</div>

<div>
    {!! Form::label('published_at', 'Publish at:') !!}
    {!! Form::date('published_at', $date) !!}
</div>

<div>
    {!! Form::submit($button) !!}
</div>