<template>
  <div class="app-header">
    <h5 id="title">Empresas 2022</h5>
  </div>
</template>

<style scoped>
.app-header {
  position: absolute;
  padding: 20px;
  width: 100%;
  height: 72px;
  background: #ffffff;
  box-shadow: 0px 0px 14px rgba(32, 59, 67, 0.08);
}

#title {
  width: 181px;
  height: 31px;

  /* Headline/5 */
  font-family: "DM Sans";
  font-style: normal;
  font-weight: 700;
  font-size: 24px;
  line-height: 130%;

  /* or 31px */
  display: flex;
  align-items: center;
  font-feature-settings: "salt" on, "ss02" on, "ss04" on;

  /* Darken-2 */
  color: #203b43;

  /* Inside auto layout */
  flex: none;
  order: 1;
  flex-grow: 0;
}
</style>
