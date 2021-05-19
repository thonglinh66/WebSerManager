 <template>
 <div class="content-wrapper"> 
              <div style="margin-left:40%; font-size:30px; padding-bottom:10px">Top 5 điểm thi cao nhất</div>
              <chart :height="170"  :chart-data="datacollection"></chart>
</div>

</template>
    <script>
    import Chart from "./Bar.vue";
    export default {
      components: {
        Chart
      },
      data() {
        return {
          datacollection: null
        };
      },
      mounted() {
        this.fillData();
      },
      methods: {
        fillData() {
        let uri = 'http://127.0.0.1:8000/api/chartbar';
         let Prices = new Array();
         let Labels = new Array();
         this.axios.get(uri).then((response) => {
            let data = response.data;
            if(data) {
               data.forEach(element => {
               Prices.push(element.studentScore);
               Labels.push(element.fullName);

               });
               this.datacollection = {
                   labels:Labels,
               datasets: [{
                    label: 'Điểm',
                    backgroundColor: ['#3e95cd', '#8e5ea2', '#3cba9f', '#e8c3b9', '#c45850', '#3e95cd', '#8e5ea2'],
                    data: Prices
                }]
               }
            }
       else {
          console.log('No data');
       }
        s}); 
        }
      }
    }
     
    
 </script>
