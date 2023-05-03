<script>
    $(document).ready(function() {
        $('#filter_page').on('click', async function(event) {
            event.preventDefault();
            axios.get('{{ route('clients.filter') }}', {
                    params: {
                        search_client: $('#searchClient').val()
                    }
                })
                .then(function(response) {
                    if (response.data.success === true) {
                        axiosForFilter(response);
                    }
                })
                .catch(function(error) {
                    console.log(error);
                });

        });

        function axiosForFilter(response) {
            $('#client-body').find('tr').remove();

            let htmlCode = '';

            if (response.data.totalRecords) {
                let i = 0;
                response.data.data.forEach(function(row) {

                    htmlCode += '<tr>';
                    htmlCode += ` <td>${row.date_profiled}</td>`;
                    if (row.profile_image == "No Image") {
                        htmlCode += ` <td>No Image</td>`;
                    } else {
                        htmlCode += ` <td><img src="${row.profile_image}"width="100"></td>`;
                    }
                    htmlCode += `
                                <td>${row.firstname}</td>
                                <td>${row.lastname}</td>
                                <td>${row.email}</td>
                                <td>${row.date_of_birth}</td>
                                <td>${row.primary_legal_counsel}</td>
                                <td>${row.case_detail}</td>`;

                    htmlCode += '</tr>';
                });
            } else {
                htmlCode += '<div class="text-center">Opps! No Client found</div>'
            }
            $('#client-body').html(htmlCode);
        }

    });
</script>
