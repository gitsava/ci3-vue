from django.contrib import admin
from .models import Article, Tag, Profile
from .forms import ArticleForm

admin.site.register(Tag)
admin.site.register(Profile)

@admin.register(Article)
class ArticleAdmin(admin.ModelAdmin):
    list_display = ('headline', 'status', 'slug', 'author')
    form = ArticleForm
    prepopulated_fields = {'slug': ('headline',), }
