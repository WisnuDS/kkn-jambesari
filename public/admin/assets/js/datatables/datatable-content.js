// Call the dataTables jQuery plugin
$(document).ready(function() {
    $('#dataTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/admin/content/data/'+CATEGORY_ID,
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
                data: 'title',
                name: 'title'
            },
            {
                data: 'user.name',
                name: 'created_by'
            },
            {
                data: 'created_at',
                name: 'created_at',
                render: function (data, type, row) {
                    return moment(data).fromNow()
                }
            },
            {
                data: 'updated_at',
                name: 'updated_at',
                render: function (data, type, row) {
                    return moment(data).fromNow()
                }
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
