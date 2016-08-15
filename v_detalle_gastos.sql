
-- ----------------------------
-- View structure for v_detalle_gastos
-- ----------------------------
DROP VIEW IF EXISTS `v_detalle_gastos`;
CREATE VIEW `v_detalle_gastos` AS SELECT 
A.*, 
B.P_COSTO_PLANIF,
B.P_COSTO,
(select C.P_CLASIFICACION_ITEM  from p_clasificacion_item C WHERE A.P_ID_ACTIVIDAD=B.P_ID_ACTIVIDAD)AS P_CLASIFICACION_ITEM,
(select C.P_NOMBRE_CLASIFICACION_ITEM from p_clasificacion_item C WHERE A.P_ID_ACTIVIDAD=B.P_ID_ACTIVIDAD)AS P_NOMBRE_CLASIFICACION_ITEM,
(select D.P_ABREVIACION_AREA from p_area D WHERE A.P_ID_PROYECTO=D.P_ID_PROYECTO AND A.P_ID_AREA=D.P_ID_AREA)AS P_ABREVIACION_AREA,
B.P_DETALLE_ITEM
FROM p_actividad A
LEFT JOIN p_gasto_item B ON A.P_ID_ACTIVIDAD=B.P_ID_ACTIVIDAD ;

