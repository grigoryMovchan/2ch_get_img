## Описание
Парсер скачивает все сорцы картинок из треда, упаковывает их в архив и отдаёт пользователю.

## Заметки
Добавил проверку на то чтобы ссылка не вела на стикер, иначе скрипт ломается.

![screenshot](https://github.com/grigoryMovchan/2ch_get_img/blob/master/images/download_animation_0.gif)

## TODO

- [x] Для каждого тредая своя папка в хранилище. Название - номер треда.
- [x] Архивация всех файлов и отдача архива через браузер.
- [x] Удаление файлов после скачивания.
- [x] Удаление архива после его отдачи пользователю
- [ ] Удаление архива даже если он не был отдан. Можно через кронтаб удалять все файлы старше n времени.
- [x] Прогресс-бар
- [x] Результат в виде дроби скачано/поставлено на скачивание
- [x] Таймер проверки статуса должен останавливаться когда загрузка завершена
- [x] Скрипт должен отдавать ссылку на скачивание или сразу файл через смену хейдеров

## BUGS
- [ ] Если запустить несколько скачиваний, то в статус-бар будут сыпаться статусы всех запущенных пхп скриптов. На работу самих пхп скриптов это не влияет.
- [x] Если файлов слишком много, то AJAX и пхп скрипты могут прерваться из-за их таймаутов раньше, чем скачивание будет завершено. Решение: причиной падения был следующий баг, скрипт качал одни и те же файлы по 3 раза.
- [x] Статус-бар неправильно отображает количество качаемых файлов. Почему-то их в 3 раза больше чем по факту есть в треде. Возможно одни и те же файлы несколько раз скачиваются и перезаписываются. Значит массив со ссылками не совсем правильно спарсен. Решение: в парсере надо было установить другой css class.
- [ ] Если на сервере файл не найден, то скрипт упадет. Лечится через get_headers https://habrahabr.ru/post/50846/