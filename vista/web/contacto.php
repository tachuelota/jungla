<table id="contactenos" align="center">
    <tr valign="top">
        <td>
        <div class="contacto">
            <form action="<?php echo BASE_URL ?>mensajes/nuevo" method="post" id="frmContacto" onsubmit="return validarContacto();">
                <h1 class="titleContacto">Dejenos su mensaje</h1>
                <table align="center" id="tbl_contacto">
                    <tr>
                        <td><label class="txtCont">Nombre</label></td>
                        <td><input type="text" name="nombreContacto" id="nombreContacto" class="k-textbox inpCont" placeholder="Ingrese su nombre" /></td>
                    </tr>
                    <tr>
                        <td><label class="txtCont">E-mail</label></td>
                        <td><input type="email" name="emailContacto" id="emailContacto" class="k-textbox inpCont" placeholder="Ingrese su e-mail" /></td>
                    </tr>
                    <tr>
                        <td><label class="txtCont">Tel&eacute;fono</label></td>
                        <td><input type="text" name="telefonoContacto" id="telefonoContacto" class="k-textbox inpCont" placeholder="Ingrese su numero telefonico" /></td>
                    <tr>
                        <td><label class="txtCont">Mensaje</label></td>
                        <td><textarea name="mensaje" id="mensaje"  class="k-textbox inpCont" placeholder="Ingrese su mensaje" /></textarea></td>
                    </tr>
                    <tr align="center">
                        <td colspan="2">
                            <button type="submit" class="k-button" id="btn_contacto">Enviar</button>
                            <button type="reset" class="k-button">Limpiar</button>
                        </td>
                    </tr>
                </table>
            </form>
            <div id="mensaje_validacion"></div>
        </div>
        <div class="contacto">
            <h1 class="titleContacto">Contactenos</h1>
            <div id="mensajeContacto">
                <p>Si deseas visitar la ciudad de Tarapoto y disfrutar de los mejores lugares turisticos somos tu mejor opcion.</p>
                        <h3>Informate</h3>
                <div>Psje. Abelardo Ramírez Nº 273<br>La Banda de Shilcayo - San Martin - Per&uacute;</div>
                <div>Teléfono: 042-522502/ 042–528953</div>
                <div>RPM: #452050/ #885542/ #596764</div>
                <div>Movistar: 942899186/ 942821644</div>
                <div>RPC: 993515577</div>
                <div>E-mail:<br>&nbsp;&nbsp;lajungla_convenciones@hotmail.com<br>&nbsp;&nbsp;alberguelajungla@gmail.com</div>
            </div>
        </div>
        </td>
        <td>
            <div class="contacto">
                <iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.pe/maps?f=q&amp;source=s_q&amp;hl=es&amp;geocode=&amp;q=tarapoto+la+jungla&amp;aq=&amp;sll=-9.243538,-75.019515&amp;sspn=24.413792,43.286133&amp;ie=UTF8&amp;hq=tarapoto+la+jungla&amp;hnear=&amp;ll=-9.243538,-75.019515&amp;spn=24.413792,43.286133&amp;t=m&amp;output=embed"></iframe><br /><small><a href="https://maps.google.com.pe/maps?f=q&amp;source=embed&amp;hl=es&amp;geocode=&amp;q=tarapoto+la+jungla&amp;aq=&amp;sll=-9.243538,-75.019515&amp;sspn=24.413792,43.286133&amp;ie=UTF8&amp;hq=tarapoto+la+jungla&amp;hnear=&amp;ll=-9.243538,-75.019515&amp;spn=24.413792,43.286133&amp;t=m" style="color:#0000FF;text-align:left">Ver mapa más grande</a></small>
            </div>
        </td>
    </tr>
</table>