<template>
    <div>
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Employees</h1>
        </div>
        <div class="container">
            <main class="mx-auto m-4">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="card">
                            <div v-if="showMessage">
                                <div class="alert alert-success">
                                    {{ message }}
                                </div>
                            </div>
                            <div class="card-header bg-dark text-white">
                                <div class="row">
                                    <div class="col">
                                        <h4>Employees List</h4>
                                    </div>
                                    <div class="col">
                                        <form>
                                            <div
                                                class="form-row align-items-center"
                                            >
                                                <div class="col">
                                                    <input
                                                        v-model="search"
                                                        type="search"
                                                        id="inlineFormInput"
                                                        class="form-controll mb-2"
                                                    />
                                                </div>
                                                <div class="col">
                                                    <button
                                                        type="submit"
                                                        class="btn btn-success mb-2"
                                                    >
                                                        Search
                                                    </button>
                                                </div>
                                                <div class="col">
                                                    <select
                                                        v-model="
                                                            selectedDeprtment
                                                        "
                                                        name="city"
                                                        class="form-control"
                                                        aria-label="Default select example"
                                                    >
                                                        <option
                                                            v-for="department in departments"
                                                            :key="department.id"
                                                            :value="
                                                                department.id
                                                            "
                                                            >{{
                                                                department.name
                                                            }}</option
                                                        >
                                                    </select>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div>
                                        <router-link
                                            :to="{ name: 'EmployeesCreate' }"
                                            class="btn btn-success float-right"
                                            >Create</router-link
                                        >
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table
                                    class="table table-bordered border-primary"
                                >
                                    <thead>
                                        <tr>
                                            <th># Id</th>
                                            <th>Firstname</th>
                                            <th>Lastname</th>
                                            <th>Middlename</th>
                                            <th>Address</th>
                                            <th>Department</th>
                                            <th>Country</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr
                                            v-for="employee in employees"
                                            :key="employee.id"
                                        >
                                            <td>{{ employee.id }}</td>
                                            <td>{{ employee.first_name }}</td>
                                            <td>{{ employee.last_name }}</td>
                                            <td>{{ employee.middle_name }}</td>
                                            <td>{{ employee.address }}</td>
                                            <td>
                                                {{ employee.department.name }}
                                            </td>
                                            <td>{{ employee.country.name }}</td>
                                            <td>
                                                <router-link
                                                    :to="{
                                                        name: 'EmployeesEdit',
                                                        params: {
                                                            id: employee.id
                                                        }
                                                    }"
                                                    class="btn btn-success"
                                                    >Edit</router-link
                                                >
                                                <button
                                                    class="btn btn-danger"
                                                    @click="
                                                        deleteEmployee(
                                                            employee.id
                                                        )
                                                    "
                                                >
                                                    Del
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            employees: [],
            showMessage: false,
            message: "",
            search: null,
            selectedDeprtment: null,
            departments: []
        };
    },
    watch: {
        search() {
            this.getEmployees();
        },
        selectedDeprtment() {
            this.getEmployees();
        }
    },
    created() {
        this.getEmployees();
        this.getDepartments();
    },
    methods: {
        getEmployees() {
            axios
                .get("/api/employees", {
                    params: {
                        search: this.search,
                        department_id: this.selectedDeprtment
                    }
                })
                .then(res => {
                    this.employees = res.data.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },
        getDepartments() {
            axios
                .get("/api/employees/departments")
                .then(res => {
                    this.departments = res.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },
        deleteEmployee(id) {
            axios
                .delete("/api/employees/" + id)
                .then(res => {
                    this.showMessage = true;
                    this.message = res.data;
                    this.getEmployees();
                })
                .catch(error => {
                    console.log(error.response.data);
                });
        }
    }
};
</script>

<style scoped></style>
