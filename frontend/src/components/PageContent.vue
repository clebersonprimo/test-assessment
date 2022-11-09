<script lang="ts">
import { library } from "@fortawesome/fontawesome-svg-core";
import { faMagnifyingGlass } from "@fortawesome/free-solid-svg-icons";
import CardItem from "./CardItem.vue";
library.add(faMagnifyingGlass);

export default {
    name: "PageContent",
    components: {
        CardItem,
    },
    data() {
        return {
            ufOptions: [{ id: "", sigla: "", nome: "Todos" }],
            cityOptions: [{ id: "", nome: "Todos" }],
            uf: "",
            city: "",
            name: "",
            companies: [
                {
                    id: "",
                    name: "",
                    description: "",
                },
            ],
            next: "",
        };
    },
    provide() {
        return {
            companies: this.companies,
        };
    },
    created() {
        this.getUf();
        this.getData();
    },
    methods: {
        getUf() {
            let url = `https://servicodados.ibge.gov.br/api/v1/localidades/estados?orderBy=nome`;
            fetch(url).then((response) =>
                response.json().then((json) => {
                    this.ufOptions = [...this.ufOptions, ...json];
                })
            );
        },
        getCities() {
            let url = `https://servicodados.ibge.gov.br/api/v1/localidades/estados/${this.uf}/municipios`;
            fetch(url).then((response) =>
                response.json().then((json) => {
                    this.cityOptions = [...this.cityOptions, ...json];
                })
            );
        },
        changeState() {
            this.getData();
            this.getCities();
        },
        changeCity() {
            this.getData();
        },
        getData(paginate: Boolean = false) {
            const stringParams = this.getParams();
            let url = `http://127.0.0.1:8000/api/companies?${stringParams}`;
            fetch(url).then((response) =>
                response.json().then((json) => {
                    if (paginate) {
                        this.companies = [...this.companies, ...json.data];
                    } else {
                        this.companies = json.data;
                    }
                    if (json.next_page_url) {
                        const { searchParams } = new URL(json.next_page_url);
                        this.next = searchParams.get("page");
                    } else {
                        this.next = "";
                    }
                })
            );
        },

        getParams() {
            let params = {
                page: this.next ?? 1,
                name: this.name,
                city: this.city,
                uf: this.uf,
            };
            let stringParams = Object.keys(params)
                .map((key) => key + "=" + params[key])
                .join("&");

            return encodeURI(stringParams);
        },
    },
};
</script>

<template>
    <div class="content">
        <div class="col-6">
            <div class="search">
                <label for="search" class="label">Buscar</label>
                <input
                    type="text"
                    name="search"
                    class="field-search"
                    placeholder="Digite o nome"
                    autocomplete="off"
                    v-model="name"
                />
                <button class="btn icon" @click="getData(false)">
                    <font-awesome-icon icon="fa-solid fa-magnifying-glass" />
                </button>
            </div>
        </div>
        <div class="col-3">
            <div class="search">
                <label for="search-state" class="label">Estado</label>
                <select
                    class="field-search"
                    @change="changeState()"
                    name="search-state"
                    v-model="uf"
                >
                    <option
                        v-for="option in ufOptions"
                        :value="option.sigla"
                        :key="option.id"
                    >
                        {{ option.nome }}
                    </option>
                </select>
            </div>
        </div>
        <div class="col-3">
            <div class="search">
                <label for="search-city" class="label">Cidade</label>
                <select
                    class="field-search"
                    name="search-city"
                    @change="changeCity()"
                    v-model="city"
                >
                    <option
                        v-for="option in cityOptions"
                        :value="!option.id ? option.id : option.nome"
                        :key="option.id"
                    >
                        {{ option.nome }}
                    </option>
                </select>
            </div>
        </div>
        <div class="list-cards">
            <div class="col-6" v-for="company in companies" :key="company.id">
                <CardItem
                    :name="company.name"
                    :description="company.description"
                />
            </div>
        </div>
        <div class="btn-more" v-if="next">
            <button class="btn" @click="getData(true)">Carregar mais</button>
        </div>
    </div>
</template>
<style scoped>
.search {
    height: 56px;
    padding: 5px;
    /* Lighten-5 */
    background: #f3f6f7;
    border-radius: 4px;
    padding: 10px;
    border-bottom: 2px solid #cbdbe0;
    transform: color();
    transition: 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    transition-property: border, opacity, transform, color;
}
.content {
    margin: 0 auto;
    width: calc(100% - 150px);
    min-height: calc(100% - 200px);
    top: 111px;

    background: #ffffff;
    border-radius: 8px;
    padding: 20px;
}
.col-3 {
    margin-bottom: 25px;
    padding-left: 15px;
    padding-right: 15px;
    display: inline-block;
    width: 25%;
}
.col-4 {
    margin-bottom: 25px;
    padding-left: 15px;
    padding-right: 15px;
    display: inline-block;
    width: 33.3333%;
}
.col-6 {
    margin-bottom: 25px;
    padding-left: 15px;
    padding-right: 15px;
    display: inline-block;
    width: 50%;
}
.filtros {
    display: inline-block;
    width: 100%;
}
.list-cards {
    margin-top: 35px;
}
.field-search {
    width: 80%;
}
.icon {
    bottom: 32px;
    float: right;
    border: none;
    background-color: #f3f6f7;
    /* Darken-1 */
    color: #2e6773;
    font-size: 20px;
}

.field-search {
    width: 98%;
}
.label {
    left: 4px;
}

.btn-more {
    left: calc(50% - 107px);
    width: 210px;
}
.btn-more > button {
    width: 208.38px;
    height: 48px;
    /* Accent-3 (Brand) */
    background: #28cc56;
    border-radius: 4px;
    border: none;
    font-family: "DM Sans";
    font-style: normal;
    font-weight: 700;
    font-size: 16px;
    line-height: 100%;
    color: #ffffff;
}

.btn:hover {
    cursor: pointer;
}

@media (max-width: 1023px) {
    .col-6 {
        width: 100% !important;
    }
    .col-3 {
        width: 50% !important;
    }
}
@media (max-width: 767px) {
    .col-3 {
        width: 100% !important;
    }
}
</style>
