@extends('layouts/app')

@section('content')

    <section class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <h3 class="page-title">
                        Request A Talk Topic
                    </h3>
                </div>
            </div>
        </div>
    </section>

    <section class="request-form">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-12 col-md-offset-2">
                    <div class="panel">
                        <h3 class="panel-heading">Submit Request Below</h3>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="panel-body">
                            <form action="{{ route('insert-topic-request') }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-group row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="fname">First Name *</label>
                                        <input type="text" name="fname" class="form-control fname" id="fname" />
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="lname">Last Name *</label>
                                        <input type="text" name="lname" class="form-control lname" id="lname" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="phone">Phone Number</label>
                                        <input type="text" name="phone" class="form-control phone" id="phone" />
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <label for="email">Email Address *</label>
                                        <input type="email" name="email" class="form-control email" id="email" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12 co-sm-12">
                                        <label for="topic_request">Your Topic Request *</label>
                                        <textarea name="topic_request" id="topic_request" cols="30" rows="10"
                                                  class="topic_request form-control"></textarea>
                                    </div>
                                </div>
                                <hr>
                                <input type="text" name="hpc" title="hpc" style="position:absolute; top: -10000px" value="1" />
                                <div class="form-group row">
                                    <div class="col-md-12 col-sm-12">
                                        <input type="submit" class="submit btn btn-primary" value="Send Request"
                                               style="width: 100%; margin: 0;"/>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection