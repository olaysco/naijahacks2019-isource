<template>
    <div>
        <table class="table table-striped border-0">
            <thead>
                <tr class="font-light">
                    <th>Title</th>
                    <th>Sector</th>
                    <th>Location</th>
                    <th>Value</th>
                    <th>Date Uploaded</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr
                    v-for="(business, index) in businesses"
                    :key="'list' + index"
                >
                    <td>{{ business.title }}</td>
                    <td>{{ business.sector }}</td>
                    <td>{{ business.location }}</td>
                    <td>&#x20a6; {{ business.value }}</td>
                    <td>
                        {{
                            business.created_at
                                | moment("dddd, MMMM Do YYYY, h:mm:ss a")
                        }}
                    </td>
                    <td>
                        <a href="#" class="text-danger"
                            ><i class="fa fa-trash"></i
                        ></a>
                        <a href="#"><i class="fa fa-pen"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
<script>
export default {
    props: {
        businesses: {
            required: true
        }
    }
};
</script>
<style scoped></style>
