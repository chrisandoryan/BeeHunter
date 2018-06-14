@extends('layouts.client.panel')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <div id="indicator" class="box-body">
                    <div class="step-mode">
                        <h3>STEPS</h3>
                        <ul class="SteppedProgress Vertical">
                            <li class="complete"><span>Hunt</span></li>
                            <li class="complete"><span>Upload</span></li>
                            <li class="complete current"><span>Fill out form</span></li>
                            <li class=""><span>Submit</span></li>
                            <li class=""><span>Being processed</span></li>
                            <li class=""><span>Reviewed</span></li>
                            <li class=""><span>Approved/Decline</span></li>
                        </ul>
                    </div>
                    <div class="bar-mode">
                            <h3 class="control-sidebar-subheading">
                                Submission Progress
                                <span class="label label-primary pull-right">Next Step: Review</span>
                                <span class="label label-success pull-right">55%</span>
                            </h3>
                            <div class="progress">
                                <div class="progress-bar progress-bar-primary progress-bar-striped" style="width: 55%"></div>
                            </div>
                        </a>
                    </div>
                </div>
                {{--</div>--}}
            </div>

            <div class="col-md-9">
                <div class="box box-primary">
                    <div class="box-body">
                        <div id="submission">
                            <div id="top">
                                <div id="subtitle">
                                    <h2>SUBMISSION</h2>
                                    <hr>
                                </div>
                            </div>
                            <div>
                                <form action="#" method="post">
                                    <ul>
                                        <li>
                                            <p>Title *</p>
                                            <input type="text" name="title">
                                        </li>
                                        <li>
                                            <p>Issue Description *</p>
                                            <textarea class="form-control" name="description"cols="50" rows="10"></textarea>
                                        </li>
                                        <li>
                                            <p>Detailed Report *</p>
                                            <input type="file" id="fileselect" name="fileselect[]" multiple="multiple" />
                                        </li>
                                        <br>
                                        <li>
                                            <input class="btn-submission" type="submit" value="Submit">
                                            <input class="btn-submission" type="submit" value="Preview">
                                            <p>Before submitting, please review our <a href="">disclosure guidelines</a> and <a href="">submission terms</a> subjectively</p>
                                        </li>
                                    </ul>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection