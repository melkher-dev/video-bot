<template>
    <AuthenticatedLayout>
        <div class="flex justify-center m-5">
            <div class="card w-2/3 bg-white shadow-xl text-gray-800">
                <div class="card-body">
                    <div>
                        <input
                            v-model="form.name"
                            type="text"
                            placeholder="Name"
                            class="input input-bordered input-primary bg-white w-full my-2"
                        />
                        <input
                            v-model="form.email"
                            type="text"
                            placeholder="Email"
                            class="input input-bordered input-primary bg-white w-full my-2"
                        />
                        <input
                            v-model="form.phone"
                            type="text"
                            placeholder="Phone"
                            class="input input-bordered input-primary bg-white w-full my-2"
                        />
                        <div class="form-control">
                            <label class="label cursor-pointer">
                                <span class="label-text text-gray-800"
                                    >Admin</span
                                >
                                <input
                                    v-model="form.is_admin"
                                    type="checkbox"
                                    checked="checked"
                                    class="checkbox checkbox-primary"
                                />
                            </label>
                        </div>
                    </div>
                    <div class="card-actions justify-end">
                        <button
                            @click="updateUser(form.id)"
                            class="btn btn-primary btn-outline btn-sm"
                        >
                            Update
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { router } from "@inertiajs/vue3";
import { onMounted } from "vue";
import { reactive } from "vue";

const props = defineProps({
    user: Object,
});

const form = reactive({
    id: "",
    name: "",
    email: "",
    phone: "",
    is_admin: false,
});

onMounted(() => {
    if (props.user) {
        form.id = props.user.id;
        form.name = props.user.name;
        form.email = props.user.email;
        form.phone = props.user.phone;
        form.is_admin = props.user.is_admin;
    }
});
const updateUser = (id) => {
    router.put(route("admin.users.update", id), form);
};
</script>

<style lang="scss" scoped></style>
