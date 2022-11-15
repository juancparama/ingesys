DELETE FROM `tickets` WHERE type_id IS NULL AND status!=0;
DELETE FROM `tickets` WHERE status=0 AND type_id IS NOT NULL;
DELETE FROM `tickets` WHERE status=2 AND closed_at IS NULL;
UPDATE `tickets` SET `closed_at` = NULL WHERE `status`!= 2;
