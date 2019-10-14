@extends('layouts.app')
@section('content')
    <div class="container">
        <br><br>
        <h1>Issues</h1>
        <form action="/home/file/fileissues" method="POST" autocomplete="off">
            <div class="form-group row">
                <label class="col-3">Subject</label>
                <input type="text" class="form-control col-2" name="fileSubject">
            </div> 
            <div class="form-group row">
                <label class="col-3">Issue</label>
                <br>
                <textarea name="fileIssue" cols="70" rows="10"></textarea>
            </div>
            <div clas="form-group row">
                <div class="col-4">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection 