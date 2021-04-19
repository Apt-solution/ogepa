    var table = $('.all-user').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('users.index') }}",
    columns: 
    [
        {data: 'id', name: 'id'},
        {data: 'first_name', name: 'first_name'},
        {data: 'last_name', name: 'last_name'},
        {data: 'phone', name: 'phone'},
        {data: 'ogwema_ref', name: 'ogwema_ref'},
        {data: 'client_type', name: 'client_type'},
        {data: 'lga', name: 'lga'},
        {data: 'address', name: 'address'},
        {
            data: 'action', 
            name: 'action', 
            orderable: true, 
            searchable: true
        },
    ]
});

var table = $('.residential').DataTable({
    processing: true,
    serverSide: true,
    ajax: "{{ route('residential.user') }}",
    columns: 
    [
        {data: 'id', name: 'id'},
        {data: 'first_name', name: 'first_name'},
        {data: 'last_name', name: 'last_name'},
        {data: 'phone', name: 'phone'},
        {data: 'ogwema_ref', name: 'ogwema_ref'},
        {data: 'client_type', name: 'client_type'},
        {data: 'lga', name: 'lga'},
        {data: 'address', name: 'address'},
        {
            data: 'action', 
            name: 'action', 
            orderable: true, 
            searchable: true
        },
    ]
});