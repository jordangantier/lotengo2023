const convertJsonToExcel = ()=>{
    fetch('/api/datosimpresion/')
    .then(response=>response.json())
    .then(data=>{
        ordenarDesc(data,'id_transaccion')
        console.log(data)
        var ws = XLSX.utils.json_to_sheet(data);
        var wb = XLSX.utils.book_new();
        XLSX.utils.sheet_add_aoa(ws, [["ID", "ASIF","NOMBRE CLIENTE","CI o NIT","TELEFONO","EMAIL","FECHA DE REGISTRO","MONTO ACUMULADO","CANTIDAD DE CARTONES","CARTONES HABILITADOS"]], { origin: "A1" });
        XLSX.utils.book_append_sheet(wb, ws, `Transacciones Lotengo${Date().now}`);
        XLSX.writeFile(wb, "transaccionesLotengo.xlsx");
    }).catch(err=>console.error(`Error al leer los datos ${err}`))
    }
    function ordenarAsc(p_array_json, p_key) {
       p_array_json.sort(function (a, b) {
          return a[p_key] < b[p_key];
       });
    }
    function ordenarDesc(p_array_json, p_key) {
       ordenarAsc(p_array_json, p_key); p_array_json.reverse();
    }
    const btnExcell = document.getElementById('btn-excell');
    btnExcell.addEventListener('click',()=>{
        convertJsonToExcel()
    })

