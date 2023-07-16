--Insercion por procemiento a tabla TipoTelefono Sucursal
BEGIN
    inTipoTelefono_Suc (1, 'Fijo 1');
    inTipoTelefono_Suc (2, 'Fijo 2');
    inTipoTelefono_Suc (3, 'Whatsapp');
END;
/

--Insercion por procemiento a tabla TipoTelefono Suscriptor
BEGIN
    inTipoTelefono_Sus (1, 'Personal');
    inTipoTelefono_Sus (2, 'Trabajo');
    inTipoTelefono_Sus (3, 'Domicilio');
    inTipoTelefono_Sus (4, 'Conyugue');
    inTipoTelefono_Sus (5, 'Madre');
    inTipoTelefono_Sus (6, 'Padre');
END;
/

--Insercion por procedimiento Telefono Suscriptor
BEGIN
    inTelSuscriptor (1, 1, '2919-505');
    inTelSuscriptor (2, 1, '2729-441');
    inTelSuscriptor (3, 1, '2043-839');
    inTelSuscriptor (4, 1, '2061-803');
    inTelSuscriptor (5, 1, '2481-067');
    inTelSuscriptor (6, 1, '2900-972');
    inTelSuscriptor (7, 1, '2111-258');
    inTelSuscriptor (8, 1, '2651-440');
    inTelSuscriptor (9, 1, '2236-617');
    inTelSuscriptor (10, 1, '2912-303');
    inTelSuscriptor (11, 1, '2896-260');
    inTelSuscriptor (12, 1, '2541-931');
    inTelSuscriptor (13, 1, '2445-985');
    inTelSuscriptor (14, 1, '2517-459');
    inTelSuscriptor (15, 1, '2270-950');
    inTelSuscriptor (16, 1, '2398-927');
    inTelSuscriptor (17, 1, '2381-921');
    inTelSuscriptor (18, 1, '2020-304');
    inTelSuscriptor (19, 1, '2366-096');
    inTelSuscriptor (20, 1, '2285-470');
    inTelSuscriptor (21, 1, '2936-402');
    inTelSuscriptor (22, 1, '2908-765');
    inTelSuscriptor (23, 1, '2119-138');
    inTelSuscriptor (24, 1, '2549-506');
    inTelSuscriptor (25, 1, '2132-789');
    inTelSuscriptor (26, 1, '2577-139');
    inTelSuscriptor (27, 1, '2135-724');
    inTelSuscriptor (28, 1, '2257-038');
    inTelSuscriptor (29, 1, '2182-092');
    inTelSuscriptor (30, 1, '2396-949');
    inTelSuscriptor (31, 1, '2540-511');
    inTelSuscriptor (32, 1, '2183-491');
    inTelSuscriptor (33, 1, '2523-419');
    inTelSuscriptor (34, 1, '2163-527');
    inTelSuscriptor (35, 1, '2461-373');
    inTelSuscriptor (36, 1, '2830-772');
    inTelSuscriptor (37, 1, '2981-432');
    inTelSuscriptor (38, 1, '2697-775');
    inTelSuscriptor (39, 1, '2440-866');
    inTelSuscriptor (40, 1, '2140-110');
    inTelSuscriptor (41, 1, '2982-596');
    inTelSuscriptor (42, 1, '2541-310');
    inTelSuscriptor (43, 1, '2276-174');
    inTelSuscriptor (44, 1, '2843-922');
    inTelSuscriptor (45, 1, '2780-248');
    inTelSuscriptor (46, 1, '2448-563');
    inTelSuscriptor (47, 1, '2081-422');
    inTelSuscriptor (48, 1, '2209-195');
    inTelSuscriptor (49, 1, '2409-970');
    inTelSuscriptor (50, 1, '2919-052');
    inTelSuscriptor (1, 6, '2979-339');
    inTelSuscriptor (2, 6, '2175-883');
    inTelSuscriptor (3, 5, '2772-848');
    inTelSuscriptor (4, 5, '2921-032');
    inTelSuscriptor (5, 2, '2358-681');
    inTelSuscriptor (6, 3, '2851-444');
    inTelSuscriptor (7, 2, '2848-243');
    inTelSuscriptor (8, 3, '2681-347');
    inTelSuscriptor (9, 2, '2853-423');
    inTelSuscriptor (10, 6, '2663-320');
    inTelSuscriptor (11, 5, '2981-837');
    inTelSuscriptor (12, 2, '2399-923');
    inTelSuscriptor (13, 3, '2753-332');
    inTelSuscriptor (14, 4, '2752-986');
    inTelSuscriptor (15, 5, '2726-900');
    inTelSuscriptor (16, 4, '2075-389');
    inTelSuscriptor (17, 2, '2591-381');
    inTelSuscriptor (18, 6, '2470-696');
    inTelSuscriptor (19, 2, '2611-519');
    inTelSuscriptor (20, 4, '2313-281');
    inTelSuscriptor (21, 2, '2457-679');
    inTelSuscriptor (22, 4, '2790-036');
    inTelSuscriptor (23, 2, '2148-724');
    inTelSuscriptor (24, 3, '2192-185');
    inTelSuscriptor (25, 2, '2265-117');
    inTelSuscriptor (26, 2, '2248-485');
    inTelSuscriptor (27, 5, '2841-959');
    inTelSuscriptor (28, 4, '2669-813');
    inTelSuscriptor (29, 3, '2423-456');
    inTelSuscriptor (30, 2, '2717-468');
    inTelSuscriptor (31, 2, '2375-781');
    inTelSuscriptor (32, 6, '2639-497');
    inTelSuscriptor (33, 2, '2657-666');
    inTelSuscriptor (34, 4, '2742-320');
    inTelSuscriptor (35, 2, '2952-547');
    inTelSuscriptor (36, 4, '2395-323');
    inTelSuscriptor (37, 2, '2234-949');
    inTelSuscriptor (38, 5, '2693-028');
    inTelSuscriptor (39, 2, '2568-491');
    inTelSuscriptor (40, 6, '2932-999');
    inTelSuscriptor (41, 5, '2698-023');
    inTelSuscriptor (42, 5, '2848-451');
    inTelSuscriptor (43, 5, '2502-012');
    inTelSuscriptor (44, 3, '2785-676');
    inTelSuscriptor (45, 2, '2448-781');
    inTelSuscriptor (46, 5, '2983-994');
    inTelSuscriptor (47, 2, '2022-514');
    inTelSuscriptor (48, 2, '2172-346');
    inTelSuscriptor (49, 4, '2780-877');
    inTelSuscriptor (50, 2, '2248-900');
END;
/

--Insercion por procedimiento Telefono Sucursal
BEGIN
    inTelSucursal (1, 1, '2290-791');
    inTelSucursal (2, 1, '2268-590');
    inTelSucursal (3, 1, '2989-847');
    inTelSucursal (4, 1, '2357-418');
    inTelSucursal (5, 1, '2999-116');
    inTelSucursal (1, 2, '2348-234');
    inTelSucursal (2, 2, '2270-797');
    inTelSucursal (3, 2, '2020-132');
    inTelSucursal (4, 2, '2923-025');
    inTelSucursal (5, 3, '6724-8199');
END;
/