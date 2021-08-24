// Call the dataTables jQuery plugin
$(document).ready(function() {
    $('#dataTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/admin/association/data',
        columns: [
            {
                data: 'id',
                name: 'id'
            },
            {
                data: 'DT_RowIndex',
                name: 'No'
            },
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'position',
                name: 'position'
            },
            {
                data: 'association_number',
                name: 'association_number'
            },
            {
                data: 'address',
                name: 'address'
            },
            {
                data: 'action',
                name: 'Action',
                render: function (data, type, row) {
                    var action = '';
                    action += '<form id="delete-'+data.id+'" action="' + data.destroy_link + '" method="post"><input type="hidden" name="_method" value="delete"><input type="hidden" name="_token" value="' + data.csrf_token + '">';
                    action += '<a href="' + data.edit_link + '" class="btn btn-sm btn-primary m-1">edit</a>';
                    action += '<button class="btn btn-danger btn-sm" type="button" onclick="clickDelete('+data.id+')">delete</button>';
                    action += '</form>';
                    return action;
                }
            }
        ],
        columnDefs: [
            {
                orderable: false,
                targets: [1,5]
            },
            {
                searchable: false,
                targets: [1,5]
            },
            {
                visible: false,
                targets: [0]
            },
        ],
        order: [[ 0, "desc" ]],
    });
});

function clickDelete(id) {
    Swal.fire({
        title: 'Do you want to delete this data?',
        showCancelButton: true,
        confirmButtonText: `Yes`,
        icon: 'warning'
    }).then((result) => {
        if (result.isConfirmed) {
            $('#delete-'+id).submit()
        }
    })
}
