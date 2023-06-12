<style type='text/css'>
body {
  margin: 0;
  padding: 0;
  direction: rtl;
}
body button,
body input,
body optgroup,
body select,
body textarea {
  font-family: inherit;
}
body a {
  color: inherit;
  text-decoration: none;
}
body h1,
body h2,
body h3,
body h4,
body h5 {
  font-weight: inherit;
}

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  /* transition: all 0.2s linear; */
}

header{
  display: flex;
  justify-content: space-between;
  background-color: yellow;
  padding: 5px;
  margin-bottom: 15px;
}

.nav-login-favorites-sec {
  display: flex;
  justify-content: space-between;
  min-width: 30%;
}

.nav-search input{
  border: none;
  padding: 5px;
  border: white 2px;
  border-radius: 2px;
  font-size: .6em;
}

.nav-search input::-webkit-input-placeholder {
  color: green;
}
.nav-search input:focus::-webkit-input-placeholder {
  color: transparent;
}


/* ALL PRODUCTS */
.all-products-card {
  background-color: purple;
}

.all-products-container {
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap;
}

.card {
  border-radius: 5px;
  margin: 4%;
  box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;
  padding: 5px;
  text-align: center;
  font-size: .6em;
}

.product-detail-card {
  margin: 4%;
  text-align: right;
  font-size: .6em;
}

/************************** SIDE NAV *********************************** */

.side-nav-products-wrapper {
  display: flex;
}

.side-nav-form {
  border: 2px black solid;
  border-radius: 4px;
  padding: 8px;
  min-width: fit-content;
}

.filter-names-wrapper {
  margin: 10px;
  border-bottom: 1px gray solid;
  padding: 2px;
  display: flex;
}

</style>

