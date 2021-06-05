# -*- coding: utf-8 -*-
from __future__ import unicode_literals

from django.contrib import admin

# Register your models here.
from absensi.models import Log, Absensi

admin.site.register(Log)
#admin.site.register(Absen)
