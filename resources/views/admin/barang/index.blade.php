@extends('admin.sidebar')

@section('container')
    <div class="p-4">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-semibold text-gray-900">Barang Management</h1>
            <a href="/admin/barang/create"
                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 transition-colors">
                <i class="fa-solid fa-plus mr-2"></i>Create Barang
            </a>
        </div>
        <table id="users-table" class="display">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Actions</th>
                </tr>
            </thead>
        </table>
    </div>
    <script>
        $(function() {
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('barang.get') }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                        width: '5%'
                    },
                    {
                        data: 'image_url',
                        name: 'image_url',
                        width: '8%',
                        render: function(data) {
                            if (data) {
                                return `
                                <img src="http://127.0.0.1:8000${data}" class="h-14 w-14 object-cover"></img>
                                `;
                            } else {
                                return `<span class="px-2 py-1 text-xs font-medium bg-gray-100 text-gray-400 rounded-full">kosong</span>`;
                            }
                        }
                    },
                    {
                        data: 'name',
                        name: 'name',
                        width: '25%'
                    },
                    {
                        data: 'price',
                        name: 'price',
                        width: '30%'
                    },
                    {
                        data: 'discount',
                        name: 'discount',
                        width: '15%',
                        render: function(data) {
                            return `<span class="px-2 py-1 text-xs font-medium ${
                        data ? 'bg-red-100 text-red-700' : 'bg-gray-100 text-gray-700'
                    } rounded-full">${ data ? data + "%" : 0 }</span>`;
                        }
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        width: '25%',
                        render: function(data, type, row) {
                            return `
                        <div class="flex gap-2">
                            <a href="/admin/barang/edit/${row.id}"
                                    class="px-3 py-1.5 text-sm text-blue-600 hover:font-semibold rounded-md transition-colors">
                                Edit
                            </a>
                            <button onClick="deleteItem(${row.id})"
                                    class="px-3 py-1.5 text-sm text-red-600 hover:font-semibold rounded-md transition-colors">
                                Delete
                            </button>
                        </div>
                    `;
                        }
                    },
                ],
                language: {
                    processing: '<i class="fa fa-spinner fa-spin fa-2x fa-fw"></i><span class="sr-only">Loading...</span>',
                    paginate: {
                        previous: '<i class="fa-solid fa-chevron-left"></i>',
                        next: '<i class="fa-solid fa-chevron-right"></i>'
                    }
                },
                drawCallback: function() {
                    $('.dataTables_paginate > .pagination').addClass('flex justify-end items-center');
                }
            });
        });

        function deleteItem(barangId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                customClass: {
                    confirmButton: 'bg-red-400',
                    cancelButton: 'bg-blue-400'
                },
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    console.log("will delete");
                    fetch(`/admin/barang/delete/${barangId}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            console.log(data);
                            if (data.success) {
                                Swal.fire(
                                    'Deleted!',
                                    'The user has been deleted.',
                                    'success'
                                );

                                // Hapus baris user dari tabel DataTable tanpa refresh halaman
                                $('#users-table').DataTable().row(`#user-${barangId}`).remove().draw();
                            } else {
                                Swal.fire(
                                    'Error!',
                                    'Something went wrong.',
                                    'error'
                                );
                            }
                        })
                        .catch(error => {
                            console.error("Error:", error);
                            Swal.fire(
                                'Error!',
                                'Failed to connect to the server.',
                                'error'
                            );
                        })
                        .finally(() => {
                            // Reload halaman setelah proses selesai
                            window.location.reload();
                        });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire(
                        'Cancelled',
                        'The user is safe :)',
                        'error'
                    );
                }
            });
        }
    </script>
@endsection
