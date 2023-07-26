<template>
    <AuthenticatedLayout>
        <div class="flex justify-center m-5">
            <a :href="route('admin.users.create')">
                <button class="btn btn-primary btn-outline btn-sm">
                    Create new user
                </button>
            </a>
        </div>
        <div class="flex justify-center">
            <div class="overflow-x-auto w-2/3 m-5">
                <table class="table bg-white">
                    <thead class="text-gray-800">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Admin</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-800">
                        <tr v-for="(user, index) in newUsers" :key="index">
                            <td>{{ user.id }}</td>
                            <td>{{ user.name }}</td>
                            <td>{{ user.email }}</td>
                            <td>{{ user.phone }}</td>
                            <td>{{ user.is_admin }}</td>
                            <td>
                                <div class="grid grid-cols-2">
                                    <div>
                                        <a
                                            :href="
                                                route(
                                                    'admin.users.edit',
                                                    user.id
                                                )
                                            "
                                        >
                                            <button
                                                class="btn btn-outline btn-primary btn-sm"
                                            >
                                                Edit
                                            </button>
                                        </a>
                                    </div>
                                    <div>
                                        <button
                                            @click="deleteUser(user.id)"
                                            class="btn btn-outline btn-error btn-sm"
                                        >
                                            Delete
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { router } from "@inertiajs/vue3";
import axios from "axios";
import { ref } from "vue";

const props = defineProps({
    users: Object,
});

const newUsers = ref(props.users);

const deleteUser = async (id) => {
    const confirmation = confirm("Are you sure you want to delete this user?");
    if (!confirmation) {
        return;
    }

    try {
        await axios.delete(route("admin.users.destroy", id));
        alert("User deleted successfully");

        const index = newUsers.value.findIndex((user) => user.id === id);
        if (index !== -1) {
            newUsers.value.splice(index, 1);
        }
    } catch (error) {
        alert("Error deleting user");
        console.error(error);
    }
};
</script>

<style scoped></style>
