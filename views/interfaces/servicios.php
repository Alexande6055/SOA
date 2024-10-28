<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Basic CRUD Application - jQuery EasyUI CRUD Demo</title>
    <link rel="stylesheet" type="text/css" href="jquery-easyui-1.10.19/themes/black/easyui.css">
    <link rel="stylesheet" type="text/css" href="jquery-easyui-1.10.19/themes/icon.css">
    <script type="text/javascript" src="jquery-easyui-1.10.19/jquery.min.js"></script>
    <script type="text/javascript" src="jquery-easyui-1.10.19/jquery.easyui.min.js"></script>
    <link rel="stylesheet" type="text/css" href="jquery-easyui-1.10.19/themes/color.css">
    <link rel="stylesheet" type="text/css" href="jquery-easyui-1.10.19/demo/demo.css">
    <link rel="stylesheet" href="css/estilosCrud.css">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <form id="estudianteForm" action="../controllers/apiRest.php" method='GET'>
                <label>Cédula</label>
                <input type="text" name='cedula' required id="cedId"> 
                <button type="button" onclick="buscarUser()">Buscar</button>
            </form>
        </div>
        <div class="message">
            <label>Deseas cerrar Sesión</label>
            <button onclick="cerrarSecion()">Salir</button>
        </div>
    </div>
<div class="cen">
    <table id="dg" title="Estudiantes" class="easyui-datagrid" style="width:950px;height:300px"
            url="http://localhost/cuarto/controllers/apiRest.php" method='GET'
            toolbar="#toolbar" pagination="true"
            rownumbers="true" fitColumns="true" singleSelect="true">
        <thead>
            <tr>
                <th field="estCedula" width="50">cedula</th>
                <th field="estNombre" width="50">nombre</th>
                <th field="estApellido" width="50">apellido</th>
                <th field="estTelefono" width="50">telefono</th>
                <th field="estDireccion" width="50">direccion</th>
                <th field="Nombre" width="50">Curso</th>
            </tr>
        </thead>
    </table>
    <div id="toolbar">
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">Nuevo Estudiante</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Edit User</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="eliminarEstudiante()">Borrar Estudiante</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="reporteGeneral()">Reporte General</a>
    </div>
    </div>
    
    <div id="dlg" class="easyui-dialog" style="width:400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
    <form id="fm" method="POST" novalidate style="margin:0;padding:20px 50px">
        <h3>Ingreso Estudiante</h3>
        <div style="margin-bottom:10px">
            <input id="idcedula" name="estCedula" class="easyui-textbox" required="true" label="Cedula:" style="width:100%" required >
        </div>
        <div style="margin-bottom:10px">
            <input name="estNombre" class="easyui-textbox" required="true" label="Nombre:" style="width:100%" required>
        </div>
        <div style="margin-bottom:10px">
            <input name="estApellido" class="easyui-textbox" required="true" label="Apellido:" style="width:100%" required>
        </div>
        <div style="margin-bottom:10px">
            <input name="estTelefono" class="easyui-textbox" required="true" label="Telefono:" style="width:100%" required>
        </div>
        <div style="margin-bottom:10px">
            <input name="estDireccion" class="easyui-textbox" required="true" label="Direccion:" style="width:100%" required>
        </div>
        <div style="margin-bottom:10px">
    <select class="easyui-combobox" id="miCombo" name="Nombre" required="true" label="Curso:" style="width:100%;" required></select>
</div>

    </form>
</div>
<div id="dlg-buttons">
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="guardarEstudiante()" style="width:90px">Guardar</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancelar</a>
</div>

<script type="text/javascript">
    var url;

function buscarUser() {
    var c= document.getElementById('cedId').value;
        $.ajax({
            url: "http://localhost/cuarto/controllers/apiRest.php?cedula="+c,
            type: "GET",
            dataType: "json",
            success: function(data) {
                $('#dg').datagrid('loadData', []); 
                $('#dg').datagrid('loadData', data);
            }
        });
    }

    function newUser() {
    $('#dlg').dialog('open').dialog('center').dialog('setTitle', 'Nuevo estudiante');
    $('#idcedula').textbox('textbox').attr('readonly', false);

    $('#fm').form('clear'); 
    window.selectedestCedula = null; 
}

function editUser() {
    var row = $('#dg').datagrid('getSelected');
    if (row) {
        $('#dlg').dialog('open').dialog('center').dialog('setTitle', 'Editar informacion del estudiante');
        $('#fm').form('load', row);
        $('#idcedula').textbox('textbox').attr('readonly', true);

        window.selectedestCedula = row.estCedula; 
    } else {
        alert('Por favor, selecciona un usuario para editar.');
    }
}

function guardarEstudiante(){
    
    var curId = $('#miCombo').combobox('getValue');
    var url= 'http://localhost/cuarto/controllers/apiRest.php?curId=' + curId;
    if (window.selectedestCedula) {
        url+='&cedula='+window.selectedestCedula;
        type='PUT';
    } else {
        type='POST';
    }
    $.ajax({
        url:url,
        type:type,
        data: $('#fm').serialize(),
        success: function(data){
            $('#dlg').dialog('close'); 
            $('#dg').datagrid('reload');
        }
    }
    );

}

function eliminarEstudiante(){
    var fila= $('#dg').datagrid('getSelected');   
    if (fila) {
        $.messager.confirm('Confirmar','Esta seguro que desea eliminar al estudiante',function(respuesta){
            if (respuesta) {
                $.ajax({
                url : 'http://localhost/cuarto/controllers/apiRest.php?cedula='+fila.estCedula,
                type:'DELETE',
                dataType:'json',
                success:function(resultado) {
                    if (resultado) {
                     $('#dg').datagrid('reload');

                    }else{
                        console.log('verifica tus datos');
                    }
                }
                });
            }
        });
    }else{
        $.messager.alert('Atencion','Seleccione un estudiante para eliminar');
    }
}

function llenarCursos(cursos){
    $('#miCombo').combobox('clear');
    $('#miCombo').combobox({
        data:cursos,
        valueField: 'curId',
        textField: 'Nombre',
        panelHeight: 'auto'
    });
}

$(document).ready(function() {
        $.ajax({
                url : 'http://localhost/cuarto/controllers/apiRest.php?cursos=true',
                type: 'GET',
                dataType: 'json',
                success:function (data){
                    llenarCursos(data);
                }
        });
});

function cerrarSecion(){
            $.ajax({
                url: 'http://localhost/cuarto/controllers/apiRest.php?cerrarSession=true',
                type:'POST',
                dataType: 'json',
                data: { cerrarSession: true }, 
                success: function(data){
                    if(data.success){
                        location.reload();
                    }

                }
            });
        }

   
function reporteGeneral(){
    window.location.href = 'http://localhost/cuarto/controllers/apiRest.php?reporte=true';
        }
    
    </script>

</body>
</html>