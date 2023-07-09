@extends('backend.views.layouts.master')
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Contactos</h4>

                        <div class="page-title-right">
                            <a href="{{ route('contact.create') }}" type="button" class="btn btn-light waves-effect">Criar Contactos</a>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Contactos</h4>
                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>Página</th>
                                    <th>Ordem</th>
                                    <th>Activo</th>
                                    <th>Acções</th>
                                </tr>
                                </thead>


                                <tbody>
                                @forelse($contacts as $contact)
                                    <tr>
                                        <td>{{ $contact->title }}</td>
                                        <td>{{ $contact->order }}</td>
                                        <td>{{ $contact->active }}</td>
                                        <td>
                                            <a href="{{ route('contact.edit', $contact->id) }}" class="btn btn-info sm" title="Edit Page"><i class="fas fa-edit"></i></a>
                                            <form action="{{ url('admin/contact/delete', $contact->id) }}" method="post" class="d-inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <a id="delete" href="{{ url('admin/contact/delete', $contact->id) }}" class="btn btn-danger sm" title="Delete Page"><i class="fas fa-trash-alt"></i></a>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="4">Ainda nao foram criados Contactos</td>
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
        $(document).ready(function (){
            $('#image').change(function (e){
                var reader = new FileReader();
                reader.onload = function (e){
                    $('#showImage').attr('src', e.target.result);
                }
                console.log(e.target.files[0]);
                reader.readAsDataURL(e.target.files[0]);
            })
        });
    </script>

    <script>
        $(function(){
            $(document).on('click','#delete',function(e){
                e.preventDefault();
                var link = $(this);

                Swal.fire({
                    title: 'Tem a certeza?',
                    text: "Pretende apagar esta Página?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sim, apagar!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        link.closest("form").submit();
                        Swal.fire(
                            'Apagada!',
                            'A Página foi apagada com sucesso.',
                            'success'
                        )
                    }
                })
            });
        });

    </script>@endsection
