@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    add a skill:
                    <form action="{{ route('skills.store') }}" method='POST'>
                        name: <input type='text' name='name' >
                        icon_path: <input type='text' name='icon_path' >
                        parent skill: 
                        <select name='parent_id'>
                            @foreach($skills as $skill)
                                <option value='{{ $skill->id }}'>{{ $skill->name }}</option>
                            @endforeach
                        </select>
                        <button type='submit' >create</button>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<table>
    @foreach($levels as $level)
        <tr style="display:flex">
            @foreach($level->skills as $skill)
                <td style="background:grey;width:80px;height:80px;border-radius:80px;display:flex;justify-content:center;alignitems:center"><img style="width:50px;height:50px" src='{{ $skill->icon_path }}' /></td>
            @endforeach
        </tr>
    @endforeach
</table>
@endsection
