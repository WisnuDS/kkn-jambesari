// Call the dataTables jQuery plugin
$(document).ready(function() {
    $('#dataTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/admin/citizen/data',
        columns: [
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'nik',
                name: 'nik'
            },
            {
                data: 'address',
                name: 'address'
            },
            {
                data: 'whatsapp_number',
                name: 'whatsapp_number'
            },
            {
                data: '_status',
                name: 'status'
            },
            {
                data: 'created_at',
                name: 'created_at',
                render: function (data, type, row) {
                    return moment(data).fromNow()
                }
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
