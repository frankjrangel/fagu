<table>
  <tbody>
<?php foreach ($facturas as $factura): ?>
  <tr>
    <td><?php echo $factura['numero'] ?></td>
    <td><?php echo $factura['fecha'] ?></td>
    <td><?php echo $factura['establecimiento'] ?></td>
    <td><a href="<?php echo site_url('facturas/agregar_producto').'/'.$factura['numero'] ?>">+</a></td>
  </tr>
<?php endforeach ?>
  </tbody>
</table>
