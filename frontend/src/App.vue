<script setup lang="ts">
import PageHeader from "./components/PageHeader.vue";
import PageContent from "./components/PageContent.vue";
</script>

<template>
  <header>
    <PageHeader></PageHeader>
    <PageContent></PageContent>
  </header>
</template>

<style>
.label {
  height: 18px;

  /* Caption */
  font-family: "DM Sans";
  font-style: normal;
  font-weight: 500;
  font-size: 14px;
  line-height: 130%;

  /* or 18px */
  display: flex;
  align-items: flex-end;
  font-feature-settings: "salt" on, "ss02" on, "ss04" on;

  /* Lighten-2 */
  color: #9ea8ac;
}
.field-search {
  border: none;
  background-color: #f3f6f7;
  float: left;
}
*:focus {
  outline: none;
}
</style>
