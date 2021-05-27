<template>
    <div class="card border-success w-25 m-auto">
        <div class="card-header">Спасибо</div>
        <div class="card-body text-success">
            <h5 class="card-title text-center">Заявка отправлена</h5>
        </div>
        <p class="text-center">
            <a class="btn btn-outline-success" @click.prevent="onClick">Назад</a>
        </p>
        <h4 class="text-center">Последние заявки</h4>
        <p class="text-center">(Данные из {{ repository }})</p>
        <ul v-if="orders !== null" class="list-group">
            <li v-for="order in orders" class="list-group-item border-bottom pr-3" :key="order.key">
                <p><strong>Имя:</strong> {{ order.name }}</p>
                <p><strong>Номер:</strong> {{ order.phone }}</p>
                <p><strong>Сообщение:</strong> {{ order.message }}</p>
            </li>
        </ul>
        <p v-else class="text-center">Пока заявок нет.</p>
    </div>
</template>

<script>
import {mapMutations} from 'vuex';
import router from '../../router';

export default {
    name: 'Success',
    data() {
        return {
            repository: '',
            orders: null,
        };
    },
    mounted() {
        axios.get('/api/orders')
            .then(res => {
                this.repository = res.data.repository;
                this.orders = res.data.orders;
            })
            .catch(error => {
            if (error.response) {
                console.log(error.response.data.errors);
            }
        });
    },
    methods: {
        onClick() {
            this.setSuccessStatus(false);
            router.push({name: 'form'});
        },
        ...mapMutations(['setSuccessStatus'])
    }
}
</script>
