<template>
    <form class="w-25 m-auto" @submit.prevent="onSubmit">
        <div class="form-group mb-3">
            <label for="name">Имя</label>
            <input class="form-control" id="name" type="text" v-model="name">
            <small v-if="errors && errors.name" class="text-danger">{{ errors.name[0] }}</small>
        </div>
        <div class="form-group mb-3">
            <label for="phone">Телефон</label>
            <input class="form-control" id="phone" type="text" v-model="phone">
            <small v-if="errors && errors.phone" class="text-danger">{{ errors.phone[0] }}</small>
        </div>
        <div class="form-group mb-3">
            <label for="message">Сообщение</label>
            <textarea class="form-control" id="message" v-model="message"></textarea>
            <small v-if="errors && errors.message" class="text-danger">{{ errors.message[0] }}</small>
        </div>
        <button type="submit" class="btn btn-success">Отправить</button>
    </form>
</template>

<script>
import {mapMutations} from 'vuex';

export default {
    name: 'Form',
    data() {
        return {
            name: '',
            phone: '',
            message: '',
            errors: null
        }
    },
    methods: {
        onSubmit() {
            axios.post('/api/order', {
                name: this.name,
                phone: this.phone,
                message: this.message,
            })
                .then(res => {
                    if (res.data.status === 'success') {
                        this.setSuccessStatus(true);
                        this.errors = null;
                        this.$router.push({name: 'success'});
                    }
                })
                .catch(error => {
                    if (error.response) {
                        this.errors = error.response.data.errors;
                    }
                });
        },
        ...mapMutations(['setSuccessStatus'])
    }
}
</script>
