<template>
    <div class="card">
        <h3 class="company">{{ name }}</h3>
        <p class="description">{{ description }}</p>
        <button class="btn-action btn-email" @click="alertEmail">
            Enviar email
        </button>
        <button class="btn-action btn-whatsapp" @click="alertWhatsapp">
            Whatsapp
        </button>
    </div>
</template>
<script lang="ts">
export default {
    name: "CompanyDetails",
    props: {
        name: String,
        description: String,
    },
    methods: {
        alertEmail() {
            alert("Enviar email");
        },
        alertWhatsapp() {
            alert("Enviar Whatsapp");
        },
    },
};
</script>

<style scoped>
.card {
    width: 100%;
    height: 156px;
    background: #ffffff;
    border: 1px solid rgba(32, 59, 67, 0.1);
    border-radius: 4px;
    padding: 25px;
}

.company {
    font-weight: 700;
    font-size: 16px;
    line-height: 21px;
    color: #608289;
}

.description {
    margin-top: 10px;
    min-height: calc(100% - 50px);
    max-height: calc(100% - 40px);
    overflow: auto;

    text-align: justify;
    font-family: "DM Sans";
    font-style: normal;
    font-weight: 400;
    font-size: 16px;
    line-height: 16px;

    /* Light Gray */
    color: #7b7e7e;
}

.btn-action {
    margin-right: 15px;
    float: left;

    height: 20px;

    /* Button/Medium 14 */
    font-family: "DM Sans";
    font-style: normal;
    font-weight: 700;
    font-size: 14px;
    line-height: 20px;

    /* identical to box height, or 143% */
    display: flex;
    align-items: center;
    text-align: center;
    font-feature-settings: "salt" on, "ss02" on, "ss04" on;
    background-color: #ffffff;
    border: none;

    /* Blue Gray (Brand) */
    color: #608289;

    /* Inside auto layout */
    flex: none;
    order: 1;
    flex-grow: 0;
}

.btn-action:hover {
    cursor: pointer;
}
</style>
