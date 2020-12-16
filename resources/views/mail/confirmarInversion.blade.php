
<div style="border: 0; margin: 0; padding: 0" marginheight="0" marginwidth="0">
    <table width="100%" cellspacing="0" cellpadding="0" border="0">
        <tbody>
            <tr>
                <td bgcolor="#F8F6F7" align="center">
                    <table width="700" cellspacing="0" cellpadding="0" border="0">
                        <tbody>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td bgcolor="#FFFFFF">
                                    <img src="https://www.housers.com/img/mails/logo-housers-mails2.png" alt="Housers" style="display: block; border: none" width="700" height="97">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="https://www.housers.com/img/mails/common-head.jpg" style="width: 100%; height: auto; display: block" alt="Housers">
                                </td>
                            </tr>
                            <tr>
                                <td bgcolor="#FFFFFF" align="center">
                                    <table width="620" cellspacing="0" cellpadding="0" border="0">
                                        <tbody>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>
                                                    <p style="font-family: Arial,Helvetica,sans-serif; font-size: 15px; color: #483b3e; text-align: justify">Hola {{ Session::get('nombre') }} {{ Session::get('apellido') }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <br>
                                                <td>
                                                    <table style="font-family: Arial,Helvetica,sans-serif; font-size: 15px; color: #483b3e" width="660" cellspacing="0" cellpadding="0" border="0">
                                                        <thead>
                                                            <tr>
                                                                <td>Nombre Propiedad</td>
                                                                <td></td>
                                                                <td>Total Invertido</td>
                                                            </tr>
                                                        </thead>
                                                        <br>
                                                        <tbody>
                                                            <tr>
                                                                <td>{{ $propiedad->nombrePropiedad }}</td>
                                                                <td></td>
                                                                <td>${{ number_format($sinCaracteres,0,',','.') }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <br>
                                                <td>
                                                    <p style="font-family: Arial,Helvetica,sans-serif; font-size: 15px; color: #483b3e; text-align: justify"><br>Un saludo,<br><strong>El equipo de Napalm</strong>.</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td bgcolor="#FFFFFF" align="center">
                                    <table style="font-family: Arial,Helvetica,sans-serif; font-size: 15px; color: #483b3e" width="660" cellspacing="0" cellpadding="0" border="0">
                                        <tbody>
                                            <tr>
                                                <td style="border-bottom: 1px solid #91ccc9">
                                                    <img src="https://www.housers.com/img/mails/housers-spacer.gif" height="15">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <img src="https://www.housers.com/img/mails/housers-spacer.gif" height="10">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="font-family: Arial,Helvetica,sans-serif; font-size: 24px; color: #483b3e" align="center"><b>Síguenos</b></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <img src="https://www.housers.com/img/mails/housers-spacer.gif" height="10">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center">
                                                    <table width="220" cellspacing="0" cellpadding="0" border="0">
                                                        <tbody>
                                                            <tr>
                                                                <td align="center">
                                                                    <a href=""><img src="https://www.housers.com/img/mails/rrss-facebook.jpg" alt="facebook" width="39" height="39" border="0"></a>
                                                                </td>
                                                                <td align="center">
                                                                    <a href="" target="_blank" rel="noreferrer"><img src="https://www.housers.com/img/mails/rrss-twitter.jpg" alt="twitter" width="39" height="39" border="0"></a>
                                                                </td>
                                                                <td align="center">
                                                                    <a href="" target="_blank" rel="noreferrer"><img src="https://www.housers.com/img/mails/rrss-linkedin.jpg" alt="linkedin" width="39" height="39" border="0"></a>
                                                                </td>
                                                                <td align="center">
                                                                    <a href="" target="_blank" rel="noreferrer"><img src="https://www.housers.com/img/mails/rrss-youtube.jpg" alt="youtube" width="39" height="39" border="0"></a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="border-bottom: 1px solid #91ccc9">
                                                    <img src="https://www.housers.com/img/mails/housers-spacer.gif" height="56">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <img src="https://www.housers.com/img/mails/housers-spacer.gif" height="4">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    
                                                    <p style="font-size: 11px; color: #aba7a8; font-family: Arial,Helvetica,sans-serif; text-align: justify">De conformidad con lo dispuesto en el artículo 5 de la Ley Orgánica 15/1999, de 13 de diciembre, de Protección de Datos de Carácter Personal, le informamos que los datos personales que usted nos facilite serán incorporados al fichero gestión de usuarios debidamente inscrito en la Agencia Española de Protección de Datos del que es responsable Housers Global Properties PFP S.L. con CIF (B-87269999) y domicilio en Torre Chamartín, calle de Dulce Chacón, 55, Planta 18. 28050 Madrid, España con la finalidad de prestar el servicio solicitado por usted como miembro de Housers.</p>
                                                    <p style="font-size: 11px; color: #aba7a8; font-family: Arial,Helvetica,sans-serif; text-align: justify">La información contenida en este mensaje es de carácter comercial y la ha recibido debido a que usted ha dado su consentimiento. Housers no proporciona asesoramiento financiero y nada en esta web debe interpretarse como tal. La información que aparece en estas páginas es para fines de información general y no constituye un asesoramiento específico. Tampoco es una recomendación para invertir. Si tiene alguna duda sobre la idoneidad de una inversión, usted debe buscarse asesoramiento financiero independiente. La información publicada en la Web respecto de las distintas alternativas de inversión no podrá ser considerada como asesoramiento en materia de inversión, teniendo, por tanto, el valor de comunicaciones comerciales de carácter general. Cualquier decisión adoptada por el Inversor constituirá una decisión informada e independiente de los mismos, y no estará basada en la especial confianza entre ellos y Housers e implicará que el Inversor ha llevado a cabo las comprobaciones, estudios y análisis que consideren pertinentes para adoptar la decisión, de la que Housers no responderá en ningún caso. El valor de sus inversiones puede subir o bajar. La rentabilidad mostrada (u objetivos) no son necesariamente indicativos de la verdadera rentabilidad futura. Los Proyectos publicados en la Web no son objeto de autorización ni de supervisión por la CNMV, CMVM, ni por el Banco de España ni por cualquier otro regulador, nacional o extranjero. Las previsiones, e información presentadas son sólo planes de negocio, y como tales, pueden ser distintos en el transcurso de las operaciones.</p>
                                                    <p style="font-size: 13px; color: #aba7a8; font-family: Arial,Helvetica,sans-serif; text-align: justify">© 2020 NAPALM </p>
                                                    <p style="font-size: 11px; color: #aba7a8; font-family: Arial,Helvetica,sans-serif; text-align: justify">direccion a utilizar</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <img src="https://www.housers.com/img/mails/housers-spacer.gif" height="10">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="https://www.housers.com/img/mails/housers-spacer-2.gif" width="0" height="30">
                                </td>
                            </tr>
                            <tr>
                                <td style="font-size: 14px; color: #838383; font-family: Arial,Helvetica,sans-serif" align="center">
                                    NAPALM, INVERSIONES INTELIGENTES.
                                    <br>
                                    <strong>*·Invierte en activos que puedes ver y tocar*</strong>
                                    {{-- 
                                    <br>
                                    Invertir ahora. <a href="https://mailtrack.io/trace/link/bc1b715636590eb02a8e89a5330ea5ad65fd5505?url=https%3A%2F%2Fwww.housers.com%2Fes%3Futm_source%3Dmailchimp%26utm_medium%3Demail_campaign%26utm_campaign%3Dagosto2017&amp;userId=5850591&amp;signature=78075b3a5d4f71f4" style="color: #91ccc9; font-weight: bold" target="_blank" rel="noreferrer">Haz click aquí</a>
                                     --}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <img src="https://www.housers.com/img/mails/housers-spacer-2.gif" width="0" height="30">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</div>