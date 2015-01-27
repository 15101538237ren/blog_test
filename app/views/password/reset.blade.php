@extends('admin._layouts.default')

@section('main')

    {{ Notification::showAll() }}

      @if ($errors->any())
                <div class="alert alert-error">
                        {{ implode('<br>', $errors->all()) }}
                </div>
        @endif

        {{ Form::open(array('route' => 'reminder.reset.post')) }}

                 <input type="hidden" name="token" value="{{ $token }}"><br/>
                  邮箱:<input type="email" name="email"><br/>
                  密码:<input type="password" name="password"><br/>
                  确认密码<input type="password" name="password_confirmation"><br/>
                  <input type="submit" value="提交">

        {{ Form::close() }}