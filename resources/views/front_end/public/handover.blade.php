

@extends('front_end.layouts.layout')

@section('content')


<div class="handover">
    <div class="container">

        <div class="title">Handover Project List</div>

        <div class="content" style="overflow-x:auto;">
            <table class="table table-striped tb">
                <thead>
                    <tr class="table-success">
                        <th class="text-danger" scope="col">Sl. No.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">No of Storied</th>
                        <th scope="col">Handover Date</th>
                    </tr>
                </thead>
                <tbody>

                    @php
                    $i = 0;
                    @endphp

                    @foreach ($data->projects as $project)

                    @php
                    $i++;
                    @endphp

                    <tr>
                        <td class="text-danger">{{ $i }}</td>
                        <td>{!! $project->name !!}</td>
                        <td>{{ $project->address }}</td>
                        <td>{{ $project->no_of_storied }}</td>
                        <td>{{ $project->handover_date }}</td>
                    </tr>

                    @endforeach

                </tbody>
            </table>
        </div>

    </div>
</div>

@endsection
