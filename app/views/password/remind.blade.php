@extends('admin._layouts.default')

@section('main')

    {{ Notification::showAll() }}
     @if ($errors->any())
                    <div class="alert alert-error">
                            {{ implode('<br>', $errors->all()) }}
                    </div>
            @endif
     {{ Form::open(array('route' => 'reminder.remind.post')) }}
        <input type="email" name="email">
        <input type="submit" value="Send Reminder">
      {{ Form::close() }}
