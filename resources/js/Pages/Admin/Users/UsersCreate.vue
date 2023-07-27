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
                        <input
                            v-model="form.password"
                            type="password"
                            placeholder="Password"
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
                            @click="storeUser"
                            class="btn btn-primary btn-outline btn-sm"
                        >
                            Save
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { reactive } from "vue";
import { router } from "@inertiajs/vue3";

const form = reactive({
    name: "",
    email: "",
    phone: "",
    password: "",
    is_admin: false,
});

const storeUser = () => {
    router.post(route("admin.users.store"), form);
};
</script>

<style lang="scss" scoped></style>
