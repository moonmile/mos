using System;
using System.Collections.Generic;
using Microsoft.EntityFrameworkCore;

namespace net7.Models;

public class MosDbContext : DbContext
{
    public MosDbContext()
    {
    }

    public MosDbContext(DbContextOptions<MosDbContext> options)
        : base(options)
    {
    }

    protected override void OnConfiguring(DbContextOptionsBuilder optionsBuilder)
    {
        if (!optionsBuilder.IsConfigured)
        {
            optionsBuilder.UseMySQL("server=localhost;database=mosdb;user id=mos;password=mos");
        }
    }

    protected override void OnModelCreating(ModelBuilder modelBuilder)
    {
    }

    public virtual DbSet<Categories> Categories { get; set; }
    public virtual DbSet<Products> Products { get; set; }

}
