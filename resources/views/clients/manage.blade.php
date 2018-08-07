@extends('layouts.client.panel')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
            <h1>
                Bounty Programs
            </h1>
    </section>

    <section class="content">
        <div class="row">
                <div class="box">
                        <div class="box-header">
            
                          {{-- <div class="box-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                              <input name="table_search" class="form-control pull-right" placeholder="Search" type="text">
            
                              <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                              </div>
                            </div>
                          </div> --}}
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                          <table class="table table-hover">
                            <tbody><tr>
                              <th>BountyID</th>
                              <th>BugProgram</th>
                              <th>Deadline</th>
                              <th>Submissions Count</th>
                              <th>Action</th>
                            </tr>
                            @foreach($programs as $program)
                              <tr>
                                <td>{{ md5($program->bounty_id) }}</td>
                                <td><a href="{{ url("/explore/programs/{$program->hash}") }}">{{ $program->title }}</a></td>
                                <td>{{ $program->deadline }}</td>
                                <td>{{ $program->sub_count }}</td>
                                @if($program->sub_count == 0 )
                                  <td>
                                    <div class="btn-group">
                                        <form method="POST" action="{{ route('client.edit.program') }}" accept-charset="UTF-8">
                                            {{ csrf_field() }}
                                          <input name="bounty_id" type="hidden" value="{{ $program->bounty_id }}}">
                                          <button type="submit" class="btn btn-sm btn-warning">Edit</button>
                                        </form>
                                    </div>
                                  </td>
                                @endif
                              </tr>
                            @endforeach
                          </tbody></table>
                        </div>
                        <!-- /.box-body -->
                      </div>
        </div>
    </section>
@endsection