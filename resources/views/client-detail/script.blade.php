<script>
    $(document).on('click', '#addClientProfile', function(ev) {
        let mee = $(this);
        ev.preventDefault();
        $("#modal-global").modal('show');
        let htmlCode = '';
        htmlCode += `
        <form id="createForm" enctype="multipart/form-data">
                 
            <div class="form-row">
                <div class="form-group col-12">
                    <label for="firstname">First Name<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="firstname" id="firstname">
                </div>
                <div class="form-group col-12">
                    <label for="lastname">Last Name<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="lastname" id="lastname">
                </div>
                <div class="form-group col-12">
                    <label for="email">Email<span class="text-danger">*</span></label>
                    <input type="email" class="form-control" name="email" id="email">
                </div>
                <div class="form-group col-12">
                    <label for="date_of_birth">Date of birth<span class="text-danger">*</span></label>
                    <input type="date" class="form-control" name="date_of_birth" id="date_of_birth">
                </div>
                <div class="form-group col-12">
                    <label for="image">Profile Image<span class="text-danger">*</span></label>
                    <input type="file" class="form-control" name="profile_image" id="image">
                </div>
                <div class="form-group col-12">
                    <label for="case_detail">Case Detail <span class="text-danger">*</span></label>
                    <textarea class="form-control" name="case_detail" id="case_detail" style="resize: none"></textarea>
                </div>
                <div class="form-group col-12">
                    <label for="primary_legal_counsel">Primary Legal Counsel <span class="text-danger">*</span></label>
                    <textarea class="form-control"  name="primary_legal_counsel" id="primary_legal_counsel" style="resize: none"></textarea>
                </div>
            </div>
                <br>
            <button type="submit" id="createSubmitBtn" class="btn btn-primary">Submit</button>
        </form>`

        $("#modal-global").find('.modal-body').html(htmlCode);
    });


    $('#createForm').on('submit', function(e) {
        e.preventDefault();
        let form = $(this);
        let url = form.attr('action');
        let data = $(this).serialize();
        alert(dat)
        loaderBtn(true, '#createSubmitBtn');
        axios.post("{{ route('clients.store') }}", data)
            .then(function(response) {
                loaderBtn(false, '#createSubmitBtn');
                // console.log(response.data);

                if (response.data.success == true) {
                    toastr.success(response.data.message);
                    // show('form#filterForm');
                    $('#createForm')[0].reset();
                    $('#modal-global').modal('hide');
                } else {
                    toastr.error(response.data.message);
                }

            })
            .catch(function(error) {
                toastr.error(error)
            });
    });
    // $(document).ready(function() {
    //     $('#filter_page').on('click', async function(event) {
    //         event.preventDefault();

    //         let data = {
    //             search_item: $('#searchItem').val()
    //         }

    //         axios.post("{{ route('clients.filter') }}", data)
    //             .then(function(response) {

    //                 if (response.data.success === true) {
    //                     axiosForFilter(response);
    //                 }
    //             })
    //             .catch(function(error) {})
    //     });

    //     function axiosForFilter(response) {
    //         $('#item-body').find('tr').remove();

    //         let htmlCode = '';

    //         if (response.data.totalRecords) {
    //             let i = 0;
    //             response.data.data.forEach(function(row) {

    //                 i++;
    //                 htmlCode += '<tr>';
    //                 htmlCode += '<td>' + i + '</td>';
    //                 htmlCode += '<td>' + row.name + '</td>';
    //                 htmlCode += '<td>' + row.description + '</td>';
    //                 htmlCode += '<td><img src="' + row.image + '" width="100"></td>';
    //                 htmlCode += '<td><a href="' + row.editLink +
    //                     '" class="btn btn-primary">Edit</a></td>';
    //                 htmlCode += '<td><form action="' + row.deleteLink + '" method="POST">';
    //                 htmlCode += '{{ method_field('DELETE') }}';
    //                 htmlCode += '@csrf';
    //                 htmlCode +=
    //                     '<button type="submit" class="btn btn-danger">Delete Item</button></form>';
    //                 htmlCode += '</td>';

    //             });
    //         } else {
    //             htmlCode += 'No Items found'
    //         }

    //         $('#item-body').html(htmlCode);

    //     }

    // });
</script>
