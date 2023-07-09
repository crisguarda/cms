@extends('backend.views.layouts.master')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Banner</h4>

                        <div class="page-title-right">
                            <a href="{{ route('banner.create') }}" type="button" class="btn btn-light waves-effect">Create Banner</a>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Pages</h4>
                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>Banner</th>
                                    <th>Page</th>
                                    <th>Order</th>
                                    <th>Active</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>


                                <tbody>
                                @forelse($banners as $banner)
                                    <tr>
                                        <td>{{ $banner->title }}</td>
                                        <td>{{ $banner->page_id == 0 ? 'Home' : (\App\Models\Page::find($banner->page_id) ? \App\Models\Page::find($banner->page_id)->title : 'Sem Página') }}</td>
                                        <td>{{ $banner->order }}</td>
                                        <td>{{ $banner->active }}</td>
                                        <td>
                                            <a href="{{ url('admin/banner/edit', $banner->id) }}" class="btn btn-info sm" title="Edit Page"><i class="fas fa-edit"></i></a>
                                            <form action="{{ url('admin/banner/delete', $banner->id) }}" method="post" class="d-inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <a id="delete" href="{{ url('admin/banner/delete', $banner->id) }}" class="btn btn-danger sm" title="Delete Page"><i class="fas fa-trash-alt"></i></a>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="4">No Banners created yet</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div>
    </div>
@endsection

@section('scripts')

    <script>
        $(function(){
            $(document).on('click','#delete',function(e){
                e.preventDefault();
                var link = $(this);

                Swal.fire({
                    title: 'Tem a certeza?',
                    text: "Pretende apagar este Banner?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sim, apagar!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        link.closest("form").submit();
                        Swal.fire(
                            'Apagado!',
                            'O Banner foi apagado com sucesso.',
                            'success'
                        )
                    }
                })
            });
        });

    </script>
@endsection
