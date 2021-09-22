<template>
  <div>
    <vue-good-table 
    :columns="columns"
    :rows="rows"
    :key="componentKey"
    />
  </div>
</template>

<script>
  export default {
    props: ["rows", "unit"],
    data() {
      return {
        columns: [
          {
            label: 'Etablissement',
            field: 'etab',
          },
          {
              label: 'Total',
              field: 'Total',
              formatFn: function(value) {
                  var val = value / 100; // in euro
                  val = val / this.unit; // in the desired unit
                  return val.toFixed(2);
              },
              thClass: 'text-end',
              tdClass: 'text-end',
          },
        ],
      }
    },
  }
</script>