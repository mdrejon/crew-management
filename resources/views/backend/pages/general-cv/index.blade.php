
@extends('layouts.backend')
@section('contents')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-xxl">
            <div class="card mb-4">
              <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Basic Layout</h5>
                <small class="text-muted float-end">Default label</small>
              </div>
                <!-- Basic Bootstrap Table -->
                <div class="card">
                    <h5 class="card-header">Table Basic</h5>
                    <div class="table-responsive text-nowrap">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Crew Name</th>
                            <th>Vessel Name</th>
                            <th>Position Applied</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @forelse ($general_cv as $data )
                                <tr>
                                    <td> <a href="{{ route('admin.crew.show', [$data->crew_id]) }}" target="_blank">

                                            <strong>{{ $data->full_name }}</strong>
                                        </a>
                                    </td>
                                    <td> <a href="{{ route('admin.vessel.show', [$data->for_vessel]) }}" target="_blank">

                                            <strong>{{ $data->vessel_name }}</strong>
                                        </a>
                                    </td>
                                    <td>{{ $data->position_applied }}</td>
                                    <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        Action
                                        </button>
                                        <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('admin.general-cv.show', [$data->id]) }}"
                                            ><i class="bx bx-edit-alt me-1"></i> View CV</a>
                                        <a class="dropdown-item" href="{{ route('admin.general-cv.edit', [$data->id]) }}"
                                            ><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                        <a class="dropdown-item" href=""
                                            ><i class="bx bx-trash me-1"></i> Delete</a>
                                        </div>
                                    </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td  colspan="4">No record Found</td>
                                </tr>
                            @endforelse

                        </tbody>
                      </table>
                    </div>
                  </div>
                  <!--/ Basic Bootstrap Table -->
            </div>
        </div>
    </div>
</div>
@endsection
