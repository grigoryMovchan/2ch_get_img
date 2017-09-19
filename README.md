## Описание
Парсер скачивает все сорцы картинок из треда, упаковывает их в архив и отдаёт пользователю.

![screenshot](https://github.com/grigoryMovchan/2ch_get_img/blob/master/images/download_animation_0.gif)

## TODO

- [x] Для каждого тредая своя папка в хранилище. Название - номер треда.
- [x] Архивация всех файлов и отдача архива через браузер.
- [x] Удаление файлов после скачивания.
- [ ] Удаление архива. Можно через кронтаб удалять все файлы старше n времени.
- [x] Прогресс-бар
- [x] Результат в виде дроби скачано/поставлено на скачивание
- [x] Таймер проверки статуса должен останавливаться когда загрузка завершена
- [ ] Скрипт должен отдавать ссылку на скачивание или сразу файл через смену хейдеров

## BUGS
- [ ] Если запустить несколько скачиваний, то в статус-бар будут сыпаться статусы всех запущенных пхп скриптов. На работу самих пхп скриптов это не влияет.
- [ ] Если файлов слишком много, то AJAX и пхп скрипты могут прерваться из-за их таймаутов раньше, чем скачивание будет завершено.
- [ ] Статус-бар неправильно отображает количество качаемых файлов. Почему-то их в 3 раза больше чем по факту есть в треде. Возможно одни и те же файлы несколько раз скачиваются и перезаписываются. Значит массив со ссылками не совсем правильно спарсен.